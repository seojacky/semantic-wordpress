# Semantic WordPress

**Stable tag:** 1.7 \
**Tags:** semantic, visual editor \
**Contributors:** seojacky \
**Requires at least:** 5.0 \
**Tested up to:** 5.6 \
**Requires PHP:** 5.6.20 \
**License:** GPLv2 or later \
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html

## Table of Contents  
* [Description](#description)  
* [Changelog](#changelog)


## Description

Плагин для добавления семантической вёрстки в записи и страницы. Поддерживает добавление и визуализацию тегов: `<article>, <section>, <div>, <strong>, <mark>` ....


<img src="http://ipic.su/img/img7/fs/kiss_33kb.1627559061.jpg">

# Визуальный редактор

Семантические теги и теги визуального оформления `<b>, <strong>, <mark>` можно добавить в визуальном редакторе с помощью кнопок.

<img src="https://i.imgur.com/kykewlf.jpg">

# HTML редактор

Теги article и section добавляются пока лишь только в HTML редакторе с помощью кнопок. 

<img src="https://i.imgur.com/tzXfnjN.jpg">

<img src="https://i.imgur.com/RFp8tic.jpg">

# Визуальный редактор
В визуальном редакторе можно удобно размечать текст с помощью тегов strong и b. Справка по тегам в колонке справа.
<img src="https://i.imgur.com/KzwEs2F.png">

# Дополнительно

Для облегчения работы в HTML редакторе рекомендую установить [Syntax Highlighter for Post/Page HTML Editor](https://github.com/ArthurGareginyan/syntax-highlighter-for-postpage-html-editor) или [HTML Editor Syntax Highlighter](https://ru.wordpress.org/plugins/html-editor-syntax-highlighter/ "HTML Editor Syntax Highlighter")   Он подсвечивает код в HTML редакторе и делает его более читабельным:
<img src="https://i.imgur.com/S8sN1av.png">

# О разработке

Чтобы поддержать плагин Вы можете <a href="https://forms.gle/NQmNV3KkfjX879Hz7">Проголосовать</a> за него. По поводу разработки - пишите в личку тг автору. 

# Как установить плагин с GitHub

Если кратко - вот инструкция с картинками https://wpincode.com/kak-ustanavlivat-plaginy-i-temy-s-github/

Или вот инструкция от меня:

1. Кликаем зелёную кнопку Clone, потом Download ZIP

2. Скачиваем архив (типа "semantic-wordpress-main.zip" или "semantic-wordpress-master.zip")

3. **Внимание!** Необходимо переименовать папку плагина внутри архива. Удалить окончание "-main" или "-master". Было: semantic-wordpress-**main** Стало: semantic-wordpress. Это обеспечит правильную работу скриптов и позволит получать автоматические обновления плагина с Github с помощью плагина  [GitHub Updater](https://github.com/afragen/github-updater "GitHub Updater")

4. В админке WP выбираем "Плагины - Добавить новый". Там нажимаем "Загрузить плагин" и далее либо указываем путь к скачанному архиву с плагином, либо перетягиваем Drag and Drop на кнопку "Выберите файл"

## Changelog

###  1.6 - 22.06.22  =
* Changed TinyMCE script

### 1.5 - 29.07.2021

* Переписал функцию добавления кнопок в TinyMCE
* Добавил кнопку добавления тега `<mark>`
