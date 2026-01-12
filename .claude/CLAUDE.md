# Talent Arena App

## プロジェクト概要

学生スポーツにおける選手(プレイヤー)とチームのスカウトマッチング Web アプリケーション

## 技術スタック

- **バックエンド**: Laravel 10 (PHP 8.1+)
- **フロントエンド**: Blade + Vanilla JS + Bootstrap 5
- **ビルドツール**: Vite
- **スタイル**: Sass
- **認証**: Laravel Sanctum
- **データベース**: MySQL (Docker)

## 開発コマンド

```bash
# フロントエンドビルド
npm run dev      # 開発サーバー起動
npm run build    # 本番ビルド

# Laravel
php artisan serve           # 開発サーバー
php artisan migrate         # マイグレーション実行
php artisan test            # テスト実行

# Docker
docker-compose up -d        # コンテナ起動
```

## ディレクトリ構造

- `app/Http/Controllers/` - コントローラー
- `app/Models/` - Eloquentモデル
- `app/Lib/` - ユーティリティクラス（YoutubeClient等）
- `resources/views/` - Bladeテンプレート
- `resources/js/` - JavaScript
- `resources/sass/` - Sassスタイル
- `routes/web.php` - Webルーティング
- `database/migrations/` - マイグレーション

## 命名規則・コーディング規約

### PHP (Controller / Model)

| 対象 | 規則 | 例 |
|------|------|-----|
| Controller | PascalCase + `Controller` | `PlayerController`, `TeamDetailsController` |
| Model | PascalCase, 単数形 | `Player`, `TeamDetails`, `VideoPosts` |
| メソッド | snake_case | `player_video_post()`, `player_register_info()` |
| 変数 | camelCase | `$videoPosts`, `$youtubeClient` |
| 定数 | UPPER_SNAKE_CASE | `DEFAULT_STATUS` |

### Blade テンプレート

| 対象 | 規則 | 例 |
|------|------|-----|
| ファイル名 | snake_case | `player_info.blade.php`, `team_details.blade.php` |
| コメント | Blade形式 | `{{-- コメント --}}` |

### SCSS / CSS

| 対象 | 規則 | 例 |
|------|------|-----|
| クラス名 | kebab-case | `.error-message`, `.font-color` |
| 変数 | `$`プレフィックス | `$primary-color` |
| ファイル分割 | ページごとに分離 | `_player_info.scss`, `_team_details.scss` |

**SCSSファイル構成:**
```
resources/sass/
├── app.scss           # エントリーポイント（各ファイルを@import）
├── _variables.scss    # 変数定義
└── _[page_name].scss  # ページ固有スタイル
```

- 共通スタイルは `app.scss` に記述
- ページ固有のスタイルは `_ページ名.scss` として分離し、`app.scss` で `@import`

### ルーティング

| 対象 | 規則 | 例 |
|------|------|-----|
| URLパス | kebab-case | `/player/video-history`, `/team/team-details` |
| route名 | snake_case | `player_register_info`, `team_details` |

### データベース

| 対象 | 規則 | 例 |
|------|------|-----|
| テーブル名 | snake_case, 複数形 | `players`, `scouts_team` |
| カラム名 | snake_case | `full_name`, `current_team`, `post_url_1` |

## コーディングスタイル

- インデント: 4スペース
- コメント: 日本語OK
- 文字コード: UTF-8

## Claude への指示

- **仕様を受け取ったら、まず実装の方向性を提案する**（いきなりコードを書かない、自走力を持つ）
- 検討してもわからない場合は、実装を行い **実装意図・修正意図を説明する**
- コードを修正した際は、必ず **修正意図（なぜその変更を行ったか）** を説明すること

## 主要なモデルとリレーション

- `Player` - 選手情報（認証ユーザー）
- `ScoutsTeam` - スカウトチーム
- `TeamDetails` - チーム詳細情報
- `VideoPosts` - 選手が投稿した動画URL
- `Sport` - 競技種別

## 注意事項

- YouTube APIを使用（`YoutubeClient`クラス）
- 認証は `web` ガードと `scouts_team` ガードの2種類
- ページネーションは `paginate()` を使用
