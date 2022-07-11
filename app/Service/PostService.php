<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($date)
    {
        try {
            DB::beginTransaction();
            if (isset($date['tag_ids'])) {
                $tagIds = $date['tag_ids'];
                unset($date['tag_ids']);
            }


            $date['preview_image'] = Storage::disk('public')->put('/images', $date['preview_image']);
            $date['main_image'] = Storage::disk('public')->put('/images', $date['main_image']);
            $post = Post::firstOrCreate($date);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($date, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($date['tag_ids'])) {
                $tagIds = $date['tag_ids'];
                unset($date['tag_ids']);
            }
            if (isset($date['preview_image'])) {
                $date['preview_image'] = Storage::disk('public')->put('/images', $date['preview_image']);
            }
            if (isset($date['main_image'])) {
                $date['main_image'] = Storage::disk('public')->put('/images', $date['main_image']);
            }
            $post->update($date);
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}
