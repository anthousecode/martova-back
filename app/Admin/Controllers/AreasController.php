<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\AreaStatus;
use Illuminate\Http\Request;

class AreasController extends AdminController
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
    protected $title = 'Участки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Area);

        $grid->column('id', 'Идентификатор');
        $grid->column('status.ru_name', 'Статус');
        $grid->column('number', 'Номер');
        $grid->column('square', 'Площадь');
        $grid->column('price', 'Цена');
        $grid->column('image', 'Изображение')/*->display(function($image){
            return  sprintf("<img alt='...' style='width: 100px; height: 100px; display: block' src='https://drive.google.com/uc?id=%s&export=download'>", $image);
        })*/;
        $grid->column('plan', 'Кадастровый план')/*->display(function($plan){
            return  sprintf("<img alt='...' style='width: 100px; height: 100px; display: block' src='https://drive.google.com/uc?id=%s&export=download'>", $plan);
        })*/;
        $grid->column('survey', 'Геодезическая съемка')/*->display(function($survey){
            return  sprintf("<img alt='...' style='width: 100px; height: 100px; display: block' src='https://drive.google.com/uc?id=%s&export=download'>", $survey);
        })*/;
        $grid->column('print_plan', 'План для печати')/*->display(function($print_plan){
            return  sprintf("<img alt='...' style='width: 100px; height: 100px; display: block' src='https://drive.google.com/uc?id=%s&export=download'>", $print_plan);
        })*/;
        $grid->column('color', 'Цвет');
        $grid->column('default_color', 'Цвет по умолчанию');
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
        $show = new Show(Area::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('status', 'Статус')->as(function ($default) {
            return $default ? $default->ru_name : '-';
        });
        $show->field('number', 'Номер');
        $show->field('square', 'Площадь');
        $show->field('price', 'Цена');
        $show->field('image', 'Изображение');
        $show->field('plan', 'Кадастровый план');
        $show->field('survey', 'Геодезическая съемка');
        $show->field('print_plan', 'План для печати');
        $show->field('color', 'Цвет');
        $show->field('default_color', 'Цвет по умолчанию');
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
        $form = new Form(new Area);
        $form->select('status_id', 'Статус Участка')
            ->options(AreaStatus::all()->pluck('ru_name', 'id'));
        $form->text('number', 'Номер')->disable();
        $form->decimal('square', 'Площадь');
        $form->decimal('price', 'Цена');
        $form->text('cad_number', 'Кадастровый номер');
        $form->text('polygon', 'Координаты');
        $form->text('stroke', 'Цвет границы');
        $form->image('image', 'Изображение');
        $form->file('plan', 'Кадастровый план (XML/TXT/PDF)')->rules('mimes:xml,txt,pdf');
        $form->file('survey', 'Геодезическая съемка (PDF/DWG)')->rules('mimes:pdf,dwg');
        $form->file('print_plan', 'План для печати (PDF)')->rules('mimes:pdf');
        $form->text('color', 'Цвет');
        $form->select('default_color', 'Цвета по умолчанию')
            ->options([
                "red" => "Красный",
                "green" => "Зеленый",
                "brown" => "Коричневый",
                "blue" => "Голубой",
                "yellow" => "Желтый",
            ]);

        $form->saving(function ($form) {
            try {
                if ($form->model()->image) {
                    \MediaManager::deleteFile($form->model()->image);
                }
                if ($form->model()->plan) {
                    \MediaManager::deleteFile($form->model()->plan);
                }
                if ($form->model()->survey) {
                    \MediaManager::deleteFile($form->model()->survey);
                }
                if ($form->model()->print_plan) {
                    \MediaManager::deleteFile($form->model()->print_plan);
                }
            } catch (\Exception $e) {
                report(\Carbon\Carbon::now()->toDateTimeString() . ': ' . $e->getMessage());
            }
        });

        $form->saved(function ($form) {
            \MediaManager::storeFileOnAdminSaving('areas_images',
                $form->image,
                Area::class,
                $form->model()->id,
                'image'
            );
            \MediaManager::storeFileOnAdminSaving('areas_cad_plans',
                $form->plan,
                Area::class,
                $form->model()->id,
                'plan'
            );
            \MediaManager::storeFileOnAdminSaving('areas_geo_record',
                $form->survey,
                Area::class,
                $form->model()->id,
                'survey'
            );
            \MediaManager::storeFileOnAdminSaving('areas_print_plans',
                $form->print_plan,
                Area::class,
                $form->model()->id,
                'print_plan'
            );
        });

        $form->saved(function ($form) {
            \Cache::flush();
        });

        return $form;
    }
}
