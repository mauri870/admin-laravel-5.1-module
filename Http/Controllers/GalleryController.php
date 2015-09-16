<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Gallery;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller {




	public function __construct(){
	}


	/**
	 * @return $this
	 */
	public function index()
	{
		$page_name = "Projetos";
		return view('admin::gallery.index')
			->with('page_name',$page_name)
			->with('user',Auth::user()->name)
			->with('galleries',Gallery::all());
	}

	public function add()
	{
		$page_name = "Novo";
		return view('admin::gallery.new')
			->with('page_name',$page_name)
			->with('user',Auth::user()->name);
	}

	/**
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function post_add(Request $request)
	{
		$rules = [
			'name'=>'required|unique:gallery|min:3',
			'body'=>'required|min:5',
			'image'=>'required|image',
		];

		$messages = [
			'name.min'=>'O campo Nome precisa ser preenchido!',
			'name.required'=>'O campo Nome precisa ser preenchido!',
			'name.unique'=>'Já existe outro projeto com o mesmo nome!',
			'body.required'=>'O campo descrição precisa ser preenchido',
			'body.min'=>'O campo descrição precisa ser preenchido',
			'image.required'=>'A imagem é obrigatória!',
			'image.image'=>'O Arquivo enviado não é uma imagem',
		];

		$validator = Validator::make($request->all(),$rules,$messages);

		if($validator->fails()){
			return redirect()
				->route('gallery.add')
				->withErrors($validator->errors())
				->withInput();
		}

		//Save on BD
		$new_project = Gallery::create($request->all());

		$project = Gallery::find($new_project->id);
		$project->img_ext = $request->file('image')->getClientOriginalExtension();
		$project->save();

		//Save Offer image
		$imageName = $new_project->id . '.' .
			$request->file('image')->getClientOriginalExtension();
		$request->file('image')->move(
			base_path() . '/public/img/gallery/', $imageName
		);

		$request->session()->flash('success','Projeto cadastrado!');
		return redirect(route('gallery.index'));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		$gallery = Gallery::find($id);
		File::delete(base_path().'/public/img/gallery/'.$id.'.'.$gallery->img_ext);
		$gallery->delete();

		Session::flash('success','Projeto deletado!');
		return redirect(route('gallery.index'));
	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function edit($id)
	{
		$gallery = new Gallery;
		$page_name = "Editar";
		return view('admin::gallery.edit')
			->with('page_name',$page_name)
			->with('user',Auth::user()->name)
			->with('gallery',$gallery->find($id));
	}

	/**
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function post_edit(Request $request, $id)
	{
		$rules = [
			'name'=>'required|min:3',
			'body'=>'required|min:5',
			'image'=>'image',
		];

		$messages = [
			'name.min'=>'O campo Nome precisa ser preenchido!',
			'name.required'=>'O campo Nome precisa ser preenchido!',
			'name.unique'=>'Já existe outra oferta com o mesmo nome!',
			'body.required'=>'O campo descrição precisa ser preenchido',
			'body.min'=>'O campo descrição precisa ser preenchido',
			'image.image'=>'O Arquivo enviado não é uma imagem',
		];

		$validator = Validator::make($request->all(),$rules,$messages);

		if($validator->fails()){
			return redirect()
				->route('gallery.edit')
				->withErrors($validator->errors())
				->withInput();
		}

		//Save on BD
		$gallery = Gallery::find($id);
		$gallery->fill($request->all());
		if(!empty($request->file('image'))){
			File::delete(base_path().'/public/img/gallery/'.$id.'.'.$gallery->img_ext);

			$gallery->img_ext = $request->file('image')->getClientOriginalExtension();
			//Save Offer image
			$imageName = $gallery->id . '.' .
				$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/img/gallery/', $imageName
			);
		}
		$gallery->save();

		$request->session()->flash('success','Projeto Atualizado!');
		return redirect(route('gallery.index'));
	}
	
}