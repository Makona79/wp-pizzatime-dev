<?php

if (!defined('ABSPATH')) {
	exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Дополнительные поля')
	->show_on_page(12)

	->add_tab('Первый экран', [
		Field::make('text', 'top_info', 'Надзаголовок'),
		Field::make('text', 'top_title', 'Заголовок'),
		Field::make('text', 'top_btn_text', 'Текст кнопки')
			->set_width(50),
		Field::make('text', 'top_btn_scroll_to', 'Класс секции для перехода по кнопке')
			->set_width(50),
		Field::make('image', 'top_image', 'Изображение'),
	])
	->add_tab('Каталог', [
		Field::make('text', 'catalog_title', 'Заголовок'),
	])
	->add_tab('О нас', [
		Field::make('text', 'about_title', 'Заголовок'),
		Field::make('rich_text', 'about_text', 'Текст'),
		Field::make('image', 'about_img', 'Изображение'),
	])
	->add_tab('Контакты', [
		Field::make('text', 'contacts_title', 'Заголовок'),
		Field::make('checkbox', 'contact_is_image', 'Показать изображение помидоров'),
	]);
Container::make('post_meta', 'Дополнительные поля')
	->show_on_page(18)

	->add_tab('Информация о странице', [
		Field::make('media_gallery', 'gallery', 'Галерея')
	]);