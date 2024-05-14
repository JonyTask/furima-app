# 環境構築

1. Dockerを起動する

2. プロジェクト直下で、以下のコマンドを実行する

```
make init
make fresh
```

## メール認証
mailtrapというツールを使用しています。
以下のリンクから会員登録をしてください。
https://mailtrap.io/

メールボックスのIntegrationsから 「laravel 7.x and 8.x」を選択し、
.envファイルのMAIL_MAILERからMAIL_ENCRYPTIONまでの項目をコピー＆ペーストしてください。
MAIL_FROM_ADDRESSは任意のメールアドレスを入力してください。
