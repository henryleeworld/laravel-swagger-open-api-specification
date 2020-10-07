# Laravel 8 Swagger 開放應用程式介面規範

Swagger 會將複雜的應用程式介面資訊結合至可互動且與語言無關的參考資源。若要對應用程式介面執行作業，Swagger 會針對要使用的 JSON 承載、HTTP 方法和特定端點提供重要的參考資料。Laravel 8 Swagger 開放應用程式介面規範主要是用的 [QuickAdminPanel](https://quickadminpanel.com) 生成的，除了一些定制代碼，可依需求彈性改造的工具。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 執行安裝 Laravel Mix 引用的依賴項目，並執行所有 Mix 任務。
```sh
$ npm install && npm run dev
```
- 如果有修改 Swagger 應用程式介面文件內容，請執行 __Artisan__ 指令的 __l5-swagger__ 來執行重新生成 Swagger 應用程式介面文件。
```sh
$ php artisan l5-swagger:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/login` 來進行登入，預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ ；也可以經由 `register` 來進行註冊。
- 登入後即可經由 `/api/documentation` 來進行 Swagger 應用程式介面文件瀏覽。

----

## 畫面截圖
![](https://i.imgur.com/SFAWeIO.png)
> 自動產生的 Swagger 參考資料提供重要概念的快速概觀、可用的管理應用程式介面端點，以及每個物件模型的說明，以協助執行開發和測試工作
