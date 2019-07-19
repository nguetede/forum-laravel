<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Commentaires;
use App\Sujets;

class lesControllers extends Controller
{
	
	public function ajouterSujet(){
		return view('forms/ajouterSujet');
	}
	
	public function deleteSujet($id){
		$sujets=Sujets::where('id','=',$id)->first();
		$sujets->delete();
		
		return redirect()->back();
	}
	
	public function listeSujets(){
		$sujets=Sujets::orderBy('created_at', 'DESC')->get();
		return view('forms/listeSujets')->with('sujets',$sujets);
	}
	
	public function commentaires($sid){
		$spj=Sujets::where('id',$sid)->pluck('pj')->toArray();
		$stitre=Sujets::where('id',$sid)->pluck('titre')->toArray();
		session(['spj' => $spj[0]]);
		session(['stitre' => $stitre[0]]);
		session(['sid' => $sid]);
		$commentaires=Commentaires::where('sid',$sid)->orderBy('created_at', 'DESC')->get();
		return view('forms/commentaires')->with('commentaires',$commentaires);
	}
	
	public function validerSujet(Request $request){
		$parameters=$request->except(['_token']);
		$pjName=$_FILES["pj"]["name"];
		$pjPath='../resources/assets/images/'.basename($pjName);
		$pjExtension=pathinfo($pjPath,PATHINFO_EXTENSION);
		$Sujetst=new Sujets();
		$Sujetst->titre=$parameters['titre'];	
		$Sujetst->description=$parameters['description'];	
		$Sujetst->pj=$pjName;
		
		if(empty($Sujetst['titre']) || empty($Sujetst['description'])){
			return redirect()->back()->with('errorBecauseEmpty','Tous les champs sont requis svp !');
		}else{
			if(move_uploaded_file($_FILES["pj"]["tmp_name"], $pjPath)){
				$Sujetst->save();
				return redirect()->route('listeSujets')->with('successSaving','Sujet ajouté avec succès !');
			}
		}
	}
	
	
	public function deleteComment($id){
		$comments=Commentaires::where('id','=',$id)->first();
		$comments->delete();
		
		return redirect()->back();
	}
	
	public function validerCommentaire(Request $request){
		$parameters=$request->except(['_token']);
		$commentaire=new Commentaires();
		$commentaire->sid=session('sid');
		$commentaire->uid=1;
		$commentaire->text=$parameters['commentaire'];
		if(empty($commentaire['text'])){
			return redirect()->back()->with('errorBecauseCommentEmpty','Le champ est requis svp !');
		}else{
			$commentaire->save();
			return redirect()->back()->with('successSaving','Commentaire ajouté avec succès !');
		}
	}

}