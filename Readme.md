# TwitterOAuthTokenResolver

TwitterのOAuthのアクセストークンをリダイレクト無しで取得するためのCLIツールです。  
Webの画面を持たないTwitterのツールを、複数のアカウントで使用したい場合に活用できるかと思います。  
[PINコードベースの認可](https://developer.twitter.com/ja/docs/basics/authentication/overview/pin-based-oauth)の仕組みを使用してアクセストークンを使用します。

# 実行方法

実行するにはdockerが必要です。

```
docker run --rm -i tkuni83/twitter-oauth-token-resolver
```

プロンプトに従って`Consumer API Key`や`PIN code`を入力すれば、`Access Token`が取得できます。

![](https://raw.githubusercontent.com/t-kuni/TwitterOAuthTokenResolver/master/docs/ss1.png)
  
`Consumer API Key`はTwitterの[開発者向けの画面](https://developer.twitter.com/en/apps)から取得してください。

![](https://raw.githubusercontent.com/t-kuni/TwitterOAuthTokenResolver/master/docs/ss3.png)

`PIN code`はツールが出力するリンクから取得してください。

![](https://raw.githubusercontent.com/t-kuni/TwitterOAuthTokenResolver/master/docs/ss2.png)


# Development Build

Build container.

```
docker build --tag twitter-oauth-token-resolver:latest .
```

```
docker run --rm -i twitter-oauth-token-resolver:latest
```