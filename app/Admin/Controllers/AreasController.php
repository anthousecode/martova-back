<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\AreaStatus;

class AreasController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Area';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Area);

        $grid->column('id', __('Id'));
        $grid->column('status.name', __('Status'));
        $grid->column('number', __('Number'));
        $grid->column('square', __('Square'));
        $grid->column('price', __('Price'));
        $grid->column('image', __('Image'));
        $grid->column('plan', __('Plan'));
        $grid->column('survey', __('Survey'));
        $grid->column('color', __('Color'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Area::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('status', __('Status'))->as(function ($default) {
            return $default ? $default->name : '-';
        });
        $show->field('number', __('Number'));
        $show->field('square', __('Square'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'));
        $show->field('plan', __('Plan'));
        $show->field('survey', __('Survey'));
        $show->field('color', __('Color'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Area);

        $form->select('status_id', 'Статус Участка')
            ->options(AreaStatus::all()->pluck('name', 'id'));
        $form->text('number', __('Number'));
        $form->decimal('square', __('Square'));
        $form->decimal('price', __('Price'));
        $form->image('image', __('Image'));
        $form->file('plan', __('Plan'))->rules('mimes:xml,txt');
        $form->file('survey', __('Survey'))->rules('mimes:pdf,dwg');
        $form->color('color', __('Color'));

        return $form;
    }
}
