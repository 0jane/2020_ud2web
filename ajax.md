# AJAX

定義：Asynchronous JavaScript and XML，非同步的 JavaScript 與 XML 技術

在不需重新載入整個網頁的情況下，能夠更新部分網頁，結合「伺服」（如 PHP）與「客戶」（JavaScript）語言的瀏覽器端網頁開發技術

## 表單（form）vs AJAX

### 表單的方式

Web 應用通常都是使用表單（form）向伺服器發送一個 HTTP 請求，伺服器接收處理傳來的表單並送回一個新的網頁

但前後兩個頁面的大部份 HTML 碼通常僅有約 5% 是變動的資料，這種做法浪費了許多頻寬。

想要更新內容或者提交一個表單，必須重新載入整個網頁

### AJAX的方式

AJAX 應用可以僅向伺服器傳送並取回指定資料，接著在客戶端使用 JavaScript 處理伺服器回應的資料，因只取須要的資料，所以伺服器回應更快且負荷也減少了。

使用 JavaScript 即時與伺服器進行少量資料交換，來非同步局部更新網頁

## AJAX 運作原理
- 使用者在「瀏覽器」觸發一個事件，例如點擊按鈕
- 將上述獲的事件的同時，使用 JavaScript 的 XMLHttpRequest 物件，在背景對「Web 伺服器」發送一個 HTTP 請求，達到與「Web 伺服器」進行資料的非同步交換
- 將從「Web 伺服器」取得的資料，使用 JavaScript 操作 DOM，來實現動態局部更新「瀏覽器」的網頁內容

PHP jquery ajax post request example - https://www.itsolutionstuff.com/post/php-jquery-ajax-post-request-exampleexample.html

Simple PHP Jquery Ajax CRUD(insert update delete) tutorial example with source code - https://www.itsolutionstuff.com/post/simple-php-jquery-ajax-crudinsert-update-delete-tutorial-example-with-source-codeexample.html

AJAX JavaScript 與 jQuery 教學範例 for PHP - https://www.footmark.info/programming-language/php/ajax-javascript-jquery-example-php/


