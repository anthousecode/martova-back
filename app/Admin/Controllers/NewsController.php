<?php

namespace App\Admin\Controllers;

use App\Models\News;
use App\Models\NewsLike;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends AdminController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Новости';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News);

        $grid->column('id', 'Идентификатор');
        $grid->column('is_published', 'Опубликовано');
        $grid->column('ru_name', 'Название');
        $grid->column('ru_description', 'Описание');
       // $grid->column('image', 'Изображение');
        $grid->column('created_at', 'Дата создания');
        $grid->column('updated_at', 'Дата обновления');

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
        $show = new Show(News::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('is_published', 'Опубликовано');
        $show->field('ru_name', 'Название');
        $show->field('ru_description', 'Описание');
        $show->field('image', 'Изображение');
        $show->field('created_at', 'Дата создания');
        $show->field('updated_at', 'Дата обновления');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new News);

        $form->image('image', 'Изображение');

        $form->radio('is_published', 'Опубликовано')->options([
            0 => 'Нет',
            1 => 'Да',
        ]);

        $form->tab('RU', function (Form $form) {
            $form->text('ru_name', 'Название (рус.)');
            $form->ckeditor('ru_description', 'Описание (рус.)');
        })->tab('UA', function (Form $form) {
            $form->text('ua_name', 'Название (укр.)');
            $form->ckeditor('ua_description', 'Описание (укр.)');
        })->tab('Комментарии', function (Form $form) {
            $form->hasMany('comments', 'Комментарии', function (Form\NestedForm $form) {
                $form->text('text', 'Комментарий')->readonly();
            });
        });

        $form->saving(function ($form) {
	try {
                if ($form->image && ($form->model()->image != $form->image)) {
                    \MediaManager::deleteFile($form->model()->image);
                }
            } catch (\Exception $e) {
                report(\Carbon\Carbon::now()->toDateTimeString() . ': ' . $e->getMessage());
            }
        });

        $form->saved(function (Form $form) {
            if ($form->isCreating()) {
                \App\Models\News::find($form->model()->id)->update([
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            } else {
                \App\Models\News::find($form->model()->id)->update([
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
            }
            \MediaManager::storeFileOnAdminSaving('news_images',
                $form->image,
                News::class,
                $form->model()->id,
                'image'
            );
        });

        return $form;
    }
}
