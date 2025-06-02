import "./bootstrap";
import "vue-toastification/dist/index.css";
import "flag-icons/css/flag-icons.min.css";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "ziggy-js";
import Toast from "vue-toastification";
import { createI18n } from "vue-i18n";
import "./echo.js";

import DashboardLayout from "./components/layout/DashboardLayout.vue";

const i18n = createI18n({
    locale: "ja",
    fallbackLocale: "en",
    legacy: false,
    messages: {
        en: {
            create: "Create",
            delete: "Delete",
            save: "Save",
            login: "Login",
            register: "Register",
            logout: "Logout",
            username: "Username",
            password: "Password",
            submit: "Submit",
            cancel: "Cancel",
            edit: "Edit",
            update: "Update",
            deleteConfirmation: "Are you sure you want to delete?",
            noResults: "No results found",

            search: "Search",
            searchPlaceholder: "Type to search...",
            assigned: "Assigned",
            assign: "Assign",
            demo: "Demo",
            test: "Test",
            detail: "Detail",
            viewDetails: "View Details",
            back: "Back",
            next: "Next",
            previous: "Previous",
            loading: "Loading...",
            review: "Review",
            demoTest: "Demo Test",
            title: "Title",
            createdBy: "Created By",
            status: "Status",
            action: "Action",
            filter: "Filter",
            category: "Category",
            allCategories: "All Categories",
            selectCategory: "Select Category",
            categories: "Categories",
            users: "Users",
            quizzes: "Quizzes",
            dashboard: "Dashboard",
            name: "Name",
            submit: "Submit",
            choice: "Choice",
            description: "Description",
            addChoice: "Add Choice",
            addQuestion: "Add Question",
            question: "Question",
            answer: "Answer",
            registeredAt: "Registered At",
            email: "Email",
            appLogin: "App Login",
            assignedAt: "Assigned At",
            yourScore: "Your Score",
            correctAnswer: "Correct Answer",
            totalQuestions: "Total Questions",
            yourAnswer: "Your Answer",
            completedAssigns: "Completed Assigns",
            noCompletedAssigns: "No completed assignments yet",
            cancel: "Cancel",
            qrCodeOnce: "This QR code can be used only once",
            scanToLogin: "Scan to login",
            pleaseWait: "Please wait, this can take a little...",
            dataUpdated: "Data is updated",
            loginSuccess: "Login successful. Welcome back!",
            refresh: "更新",
            dataCreated: "Data is created",
            score: "Score",
            pending: "Pending",
            complete: "Complete",
            explanation: "explanation",
            draft: "Draft",
            published: "Published",
            exportResult: "Export Results",
            dataEmpty: "Data is empty",
            notifications: "Notifications",
            confirmPassword: "confirm Password",
            confirmEmail: 'confirm Email',
            message: 'message'
        },
        ja: {
              message: 'メッセージ',
            pending: "保留中",
            complete: "完了",
            score: "スコア",
            create: "作成",
            delete: "削除",
            save: "保存",
            login: "ログイン",
            register: "登録",
            logout: "ログアウト",
            username: "ユーザー名",
            password: "パスワード",
            submit: "送信",
            cancel: "キャンセル",
            edit: "編集",
            update: "更新",
            deleteConfirmation: "削除してもよろしいですか？",
            noResults: "結果が見つかりません",

            search: "検索",
            searchPlaceholder: "検索語を入力...",
            assigned: "割り当て済み",
            assign: "割り当てる",
            demo: "デモ",
            test: "テスト",
            detail: "詳細",
            viewDetails: "詳細を見る",
            back: "戻る",
            next: "次へ",
            previous: "前へ",
            loading: "読み込み中...",
            review: "レビュー",
            demoTest: "デモテスト",
            title: "タイトル",
            createdBy: "作成者",
            status: "ステータス",
            action: "操作",
            filter: "フィルター",
            category: "カテゴリー",
            allCategories: "すべてのカテゴリー",
            selectCategory: "カテゴリーを選択",
            categories: "カテゴリー",
            users: "ユーザー",
            quizzes: "クイズ",
            dashboard: "ダッシュボード",
            name: "名前",
            submit: "送信",
            choice: "選択",
            addChoice: "選択肢を追加",
            description: "説明",
            addQuestion: "質問を追加",
            question: "質問",
            addAnswer: "答えを追加",
            answer: "答え",
            registeredAt: "登録日",
            email: "メール",
            confirmEmail : 'メール確認',
            appLogin: "アプリログイン",
            assignedAt: "割り当て日時",
            yourScore: "あなたのスコア",
            correctAnswer: "正解",
            totalQuestions: "総質問数",
            yourAnswer: "あなたの答え",
            completedAssigns: "完了した課題",
            noCompletedAssigns: "まだ完了した課題はありません",
            cancel: "キャンセル",
            qrCodeOnce: "このQRコードは一度だけ使用できます",
            scanToLogin: "スキャンしてログイン",
            pleaseWait: "しばらくお待ちください、少し時間がかかります...",
            dataUpdated: "データが更新されました",
            loginSuccess: "ログインに成功しました。お帰りなさい！",
            refresh: "更新",
            dataCreated: "データが作成されました",
            explanation: "説明 ",
            draft: "下書き",
            published: "公開",
            exportResult: "エクスポート結果",
            dataEmpty: "データがありません",
            notifications: "通知",
            confirmPassword: "パスワード確認",
        },
    },
});

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: false });
        const page = await pages[`./Pages/${name}.vue`]();

        if (
            ![
                "Auth/Login",
                "Auth/Register",
                "App/Download",
                "App/Index",
            ].includes(name)
        ) {
            page.default.layout ??= DashboardLayout;
        }

        return page.default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toast)
            .use(i18n)
            .mount(el);
    },
}).then(() => {
    document.getElementById("app").removeAttribute("data-page");
});
