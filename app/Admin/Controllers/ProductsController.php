<?php

namespace App\Admin\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('image', __('封面图片'));

        $grid->column('title', __('商品名称'));
        //$grid->column('description', __('商品描述'));
        $grid->column('on_sale', __('已上架'))->display(function ($value) {
            return $value ? '是' : '否';
        });
        //$grid->column('stock', __('库存'));
        //$grid->column('sold_count', __('销量'));
        $grid->column('set_price', __('定价'));
        $grid->column('sale_price', __('打折价格'));
        $grid->column('rating', __('评分'));
        $grid->column('category_id', __('分类名'))->display(function ($categoryId) {
            return Categories::where('id',$categoryId)->value('title');
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));

        $grid->actions(function ($actions) {
            $actions->disableDelete();
        });

        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('商品名称'));
        $show->field('description', __('商品描述'));
        $show->field('image', __('封面图片'));
        $show->field('on_sale', __('已上架'));
        $show->field('stock', __('库存'));
        $show->field('sold_count', __('销量'));
        $show->field('set_price', __('定价'));
        $show->field('sale_price', __('打折价格'));
        $show->field('rating', __('评分'));
        $show->field('category_id', __('Category id'));
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
        $form = new Form(new Product);

        $form->number('category_id', __('分类名'))->default(1);

        // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
        $form->text('title', '商品名称')->rules('required');

        // 创建一个选择图片的框
        $form->image('image', '封面图片')->rules('required|image');

        // 创建一个富文本编辑器
//        $form->textarea('description', '商品描述')->rules('required');
        // options 中参数会覆盖 extensions.ueditor.config 中参数
        $form->UEditor('description','商品描述')->options(['initialFrameHeight' => 800]);
        // 创建一组单选框
        $form->radio('on_sale', '上架')->options(['1' => '是', '0'=> '否'])->default('0');

        $form->number('stock', __('库存'));
        $form->number('sold_count', __('销量'));
        $form->decimal('set_price', __('定价'))->default(0);
        $form->decimal('sale_price', __('打折价格'))->default(0);
        $form->decimal('rating', __('评分'))->default(5.00);

        // 直接添加一对多的关联模型
        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });

        return $form;
    }
}
