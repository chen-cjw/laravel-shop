<?php

namespace App\Admin\Controllers;

use App\Models\Categories;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Categories);

        $grid->column('id', __('ID'));
        $grid->column('title', __('分类名'));
        $grid->column('sort_num', __('排序'));
        $grid->column('on_sale', __('已显示'))->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Categories);

        $form->text('title', __('分类名'));
        $form->number('sort_num', __('排序'))->default(0);
        $form->select('on_sale', __('已显示'))->options([true => '是', false => '否']);

        return $form;
    }
}
