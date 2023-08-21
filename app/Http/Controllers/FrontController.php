<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Project;
use App\Models\Mechanic;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // Getting Videos from Tag
        $tag = Tag::find(1);
        dd($tag->videos);

        // Getting Posts from Tag
        $tag = Tag::find(1);
        dd($tag->posts);
    }

    // Polymophic Many to Many relationship geting tags from multiple model
    public function getTagFromVideoOrPost()
    {
        // Get tags of the video
        $video = Video::find(1);
        dd($video->tags);

        // Get tags of the Post
        // $post = Post::find(1);
        // dd($post->tags);
    }


    // Getting Post or Video using morphmany relationship from comment
    public function commentPostOrVideo()
    {
        $comment = Comment::findOrFail(4);
        $commentable = $comment->commentable;
        dd($commentable);
    }

    // Getting comments of either Post or Video using MorphMany relationship
    public function postOrVideoComments()
    {
        $video = Video::with('comments')->whereId(6)->firstOrFail();
        dd($video);
        // $post = Post::with('comments')->whereId(6)->firstOrFail();
        // dd($post);
    }

    // Morph One to One relationship geting  post or user of the image
    public function imageUserOrPost()
    {
        $image = Image::find(3);
        $imageable = $image->imageable;
        dd($imageable);
    }

    // Morph One to One relationship geting image from post
    public function postImages()
    {
        $post = Post::with('image')->whereId(1)->firstOrFail();
        dd($post->image);
    }

    // Many to Many Detach Roles from user
    public function detachRole()
    {
        $user = User::find(1);
        $user->roles()->detach(2);
        dd($user->roles);
    }

    // Many to Many Roles attach to user
    public function attachRoles()
    {
        $user = User::find(1);
        $roleIds = [1, 2]; // Example role IDs
        $user->roles()->attach($roleIds);
        dd($user->roles);
    }


    // Project hasHanyThrough environment to
    public function projectToDeployement()
    {
        $project = Project::find(101);
        $project->deployments;
        dd($project);
    }


    // Mechanic HasManyOne through car to owner
    public function mechanicToOwner()
    {
        $mechanic = Mechanic::find(1);
        $mechanic->carOwner;
        dd($mechanic); // this gives owner detail
    }
}
