# 2020 文藻數位系 網頁程式設計
108-2 文藻數位系 網頁程式設計

PHP PDO 資料表功能

* 資料庫連線檢查   db_connect.php
* 資料表列出資料(程式)        db_tblist.php
* 資料表列出資料(網頁與程式)   device_list.php
* 顯示單筆詳細資料 device_show.php?id=xx
* 資料表新增資料
* 資料表修改資料
* 資料表刪除資料

---

PDO-fetch()-取得一列結果列，以陣列或物件方式回傳

在使用 PDO 查詢時，可以指定接收的格式，是以陣列(數字索引、欄位名稱索引)，或是以物件方式回傳。

常用參數如下：
PDO::FETCH_ASSOC 返回以欄位名稱作為索引鍵(key)的陣列(array)
PDO::FETCH_NUM 返回以數字作為索引鍵(key)的陣列(array)，由0開始編號
PDO::FETCH_BOTH 返回 FETCH_ASSOC 和 FETCH_NUM 的結果，兩個都會列出
PDO::FETCH_CLASS 返回一個物件，以欄位名稱設定屬性，並把設值給該屬性

rowCount() - 取得的資料筆數
