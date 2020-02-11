<?php

namespace App\Admin\Controllers;

use App\Models\Gallery;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use File;

class GalleryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Галерея';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Gallery);

        $grid->column('id', 'Идентификатор');
        $grid->column('image', 'Изображение');
        $grid->column('created_at', 'Время создания');
        $grid->column('updated_at', 'Время обновления');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Gallery::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('image', 'Изображение');
        $show->field('created_at', 'Время создания');
        $show->field('updated_at', 'Время обновления');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Gallery);

        $form->image('image', 'Изображение');

        $form->saved(function(Form $form){
//            $id = $form->model()->id;
//            $imageName = $form->image->getClientOriginalName();
//            $storedImageName = uniqid() . '_' . $id . '_' . $imageName;

//            File::move(
//                public_path('upload/image/' . $imageName),
//                public_path('upload/image/' . $storedImageName)
//            );
//
//            \App\Models\Gallery::find($id)
//                                ->update(['image' => 'image/' . $storedImageName]);

            $client = new \Google_Client();
            $client->setApplicationName(config('services.google.name'));
            $client->addScope(\Google_Service_Drive::DRIVE);
            putenv('GOOGLE_APPLICATION_CREDENTIALS=' . public_path() . '/martova-5f65bbf30170.json');
            $client->useApplicationDefaultCredentials();
            $service = new \Google_Service_Drive($client);

            // q => filder id, in parent folders
            $result = $service->files->listFiles([
                'q' => "'1fBdTt0SVghIUzD3Qcc3nh1uYZjxv4dwd' in parents",
                'fields' => 'files()',
            ]);

            $files = $result->getFiles();
            foreach ($files as $file) {
                    dump($file);
            }
            dd('...');
        });

        return $form;
    }
}
