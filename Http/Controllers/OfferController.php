<?php namespace Modules\Admin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Offer;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\File;

class OfferController extends Controller {

    /**
     * @var array
     */
    private $app;

	public function __construct(){
	}

	/**
	 * @return $this
	 */
	public function index(){
		$page_name = "Ofertas";
		return view('admin::offer.index')
			->with('page_name',$page_name)
			->with('user',Auth::user()->name)
			->with('offers',Offer::all());
	}

	/**
	 * @return $this
	 */
	public function add()
	{
		$page_name = "Nova Oferta";
		return view('admin::offer.new')
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
			'name'=>'required|unique:offers|min:3',
			'body'=>'required|min:5',
			'base_value'=>'regex:/^[0-9]+(?:\,[0-9]{2}){0,1}$/',
			'promo_value'=>'regex:/^[0-9]+(?:\,[0-9]{2}){0,1}$/',
			'link_offer'=>'url',
			'image'=>'required|image',
		];

		$messages = [
			'name.min'=>'O campo Nome precisa ser preenchido!',
			'name.required'=>'O campo Nome precisa ser preenchido!',
			'name.unique'=>'Já existe outra oferta com o mesmo nome!',
			'body.required'=>'O campo descrição precisa ser preenchido',
			'body.min'=>'O campo descrição precisa ser preenchido',
			'base_value.required'=>'O campo Preço Normal precisa ser preenchido',
			'base_value.regex'=>'O campo Preço Normal precisa ser numérico',
			'promo_value.required'=>'O campo Preço em Oferta precisa ser preenchido',
			'promo_value.regex'=>'O campo Preço em Oferta precisa ser numérico',
			'link_offer.required'=>'O campo Link da oferta precisa ser preenchido',
			'link_offer.url'=>'O campo Link da Oferta precisa ser uma url válida',
			'image.required'=>'A imagem é obrigatória!',
			'image.image'=>'O Arquivo enviado não é uma imagem',
		];

		$validator = Validator::make($request->all(),$rules,$messages);

		if($validator->fails()){
			return redirect()
				->route('offer.add')
				->withErrors($validator->errors())
				->withInput();
		}

		//Save on BD
		$new_offer = Offer::create($request->all());

		$offer = Offer::find($new_offer->id);
		$offer->img_ext = $request->file('image')->getClientOriginalExtension();
		$offer->save();

		//Save Offer image
		$imageName = $new_offer->id . '.' .
			$request->file('image')->getClientOriginalExtension();
		$request->file('image')->move(
			base_path() . '/public/img/offers/', $imageName
		);

		$request->session()->flash('success','Oferta cadastrada!');
		return redirect(route('offer.add'));
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function delete($id)
	{
		$offer = Offer::find($id);
		File::delete(base_path().'/public/img/offers/'.$id.'.'.$offer->img_ext);
		$offer->delete();

		Session::flash('success','Oferta deletada!');
		return redirect(route('offer.index'));
	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function edit($id)
	{
		$offer = new Offer;
		$page_name = "Nova Oferta";
		return view('admin::offer.edit')
			->with('page_name',$page_name)
			->with('user',Auth::user()->name)
			->with('offer',$offer->find($id));
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
			'base_value'=>'regex:/^[0-9]+(?:\,[0-9]{2}){0,1}$/',
			'promo_value'=>'regex:/^[0-9]+(?:\,[0-9]{2}){0,1}$/',
			'link_offer'=>'url',
			'image'=>'image',
		];

		$messages = [
			'name.min'=>'O campo Nome precisa ser preenchido!',
			'name.required'=>'O campo Nome precisa ser preenchido!',
			'name.unique'=>'Já existe outra oferta com o mesmo nome!',
			'body.required'=>'O campo descrição precisa ser preenchido',
			'body.min'=>'O campo descrição precisa ser preenchido',
			'base_value.required'=>'O campo Preço Normal precisa ser preenchido',
			'base_value.regex'=>'O campo Preço Normal precisa ser numérico',
			'promo_value.required'=>'O campo Preço em Oferta precisa ser preenchido',
			'promo_value.regex'=>'O campo Preço em Oferta precisa ser numérico',
			'link_offer.required'=>'O campo Link da oferta precisa ser preenchido',
			'link_offer.url'=>'O campo Link da Oferta precisa ser uma url válida',
			'image.required'=>'A imagem é obrigatória!',
			'image.image'=>'O Arquivo enviado não é uma imagem',
		];

		$validator = Validator::make($request->all(),$rules,$messages);

		if($validator->fails()){
			return redirect()
				->route('offer.edit')
				->withErrors($validator->errors())
				->withInput();
		}

		//Save on BD
		$offer = Offer::find($id);
		$offer->fill($request->all());
		if(!empty($request->file('image'))){
			File::delete(base_path().'/public/img/offers/'.$id.'.'.$offer->img_ext);

			$offer->img_ext = $request->file('image')->getClientOriginalExtension();
			//Save Offer image
			$imageName = $offer->id . '.' .
				$request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/img/offers/', $imageName
			);
		}
		$offer->save();

		$request->session()->flash('success','Oferta atualizada!');
		return redirect(route('offer.index'));
	}
	
}