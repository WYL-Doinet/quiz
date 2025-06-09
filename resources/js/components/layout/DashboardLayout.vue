<template>
    <div class="flex h-screen">
        <div class="w-[250px] flex flex-col bg-indigo-950">
            <h1 class="text-center text-white font-bold text-4xl p-3 italic">
                <span class="text-orange-500">Lara</span> Quiz
            </h1>
            <ul class="px-12 mt-5 space-y-5 flex-1">
                <li
                    :class="[
                        'text-md items-center flex gap-2 ',
                        route().current('home.dashboard')
                            ? 'text-orange-500 font-bold'
                            : 'text-white',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z"
                        />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z"
                        />
                    </svg>
                    <Link :href="route('home.dashboard')">{{
                        $t("dashboard")
                    }}</Link>
                </li>
                <li
                    :class="[
                        'text-md items-center flex gap-2 ',
                        route().current('category.*')
                            ? 'text-orange-500 font-bold'
                            : 'text-white',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <Link
                        :only="['categories']"
                        :href="route('category.index')"
                        >{{ $t("categories") }}</Link
                    >
                </li>
                <li
                    :only="['quizzes']"
                    :class="[
                        'text-md items-center flex gap-2 ',
                        route().current('quiz.*')
                            ? 'text-orange-500 font-bold'
                            : 'text-white',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <Link :href="route('quiz.index')">{{ $t("quizzes") }}</Link>
                </li>
                <li
                    :only="['users']"
                    :class="[
                        'text-md items-center flex gap-2 ',
                        route().current('user.*')
                            ? 'text-orange-500 font-bold'
                            : 'text-white',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                            clip-rule="evenodd"
                        />
                        <path
                            d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z"
                        />
                    </svg>
                    <Link :href="route('user.index')">{{ $t("users") }}</Link>
                </li>
                <li
                    :only="['users']"
                    :class="[
                        'text-md items-center flex gap-2 ',
                        route().current('notification.*')
                            ? 'text-orange-500 font-bold'
                            : 'text-white',
                    ]"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    <Link :href="route('notification.index')">{{
                        $t("notifications")
                    }}</Link>
                </li>
            </ul>
            <div>
                <div class="p-3 font-extrabold text-md text-white text-center">
                    <p>
                        <span class="italic"
                            ><span class="text-orange-500">Crafted</span>
                            with</span
                        >
                        💻 + ☕
                    </p>
                </div>
            </div>
        </div>
        <div class="flex-1 overflow-hidden flex flex-col">
            <div class="bg-white px-5 py-2 flex justify-between gap-5">
                <button
                    @click="logout"
                    class="btn-danger flex justify-center items-center gap-2"
                >
                    <span>{{ $t("logout") }}</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>
                <div class="flex items-center gap-5">
                    <div class="relative">
                        <div
                            data-locale
                            class="flex items-center gap-x-1 text-indigo-800 cursor-default"
                            @click="
                                $event.stopPropagation();
                                localeDropdown = !localeDropdown;
                            "
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 pointer-events-none"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802"
                                />
                            </svg>
                            <span class="font-semibold pointer-events-none">{{
                              $t(language)
                            }}</span>
                        </div>
                        <Transition name="fade">
                            <div
                                v-if="localeDropdown"
                                class="w-[150px] absolute bg-white z-50 right-3.5 mt-1 border-gray-300 border rounded-sm"
                            >
                                <div
                                    v-for="locale in locales"
                                    :key="locale.value"
                                    @click="
                                        $event.stopPropagation();
                                        onLocaleChange(
                                            locale.flag,
                                            locale.value
                                        );
                                    "
                                    data-locale
                                    class="flex items-center gap-2 border-b border-b-gray-300 p-1.5 cursor-pointer"
                                >
                                    <span
                                        :class="locale.flag"
                                        class="text-xl border border-gray-300 rounded-md pointer-events-none"
                                    ></span>
                                    <p
                                        class="text-sm text-indigo-900 font-semibold pointer-events-none"
                                    >
                                        {{ $t(locale.label) }}
                                    </p>
                                </div>
                            </div>
                        </Transition>
                    </div>
                    <button
                        @click="
                            notificationModal.open = !notificationModal.open
                        "
                        type="button"
                        class="relative cursor-pointer inline-flex items-center p-2.5 text-sm font-medium text-center text-white bg-indigo-500 rounded-full hover:bg-indigo-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            class="size-5 fill-white"
                        >
                            <path
                                d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z"
                            />
                            <path
                                fill-rule="evenodd"
                                d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <span class="sr-only">Notifications</span>
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"
                        >
                            {{ notifications.length }}
                        </div>
                    </button>
                </div>
            </div>
            <div
                class="bg-gray-100 flex-1 p-5 relative flex flex-col overflow-y-scroll"
                id="scroll-able"
            >
                <transition name="fade">
                    <NotificationModal
                        :hideModal="() => (notificationModal.open = false)"
                        v-if="notificationModal.open"
                        :notifications="notifications"
                    />
                </transition>

                <div class="bg-white p-5 flex-1 rounded-lg space-y-5">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link, router, usePage } from "@inertiajs/vue3";
import NotificationModal from "../NotificationModal.vue";
import { computed, onMounted, onUnmounted, ref, watch } from "vue";
import { POSITION, useToast } from "vue-toastification";
import { useI18n } from "vue-i18n";
const { locale } = useI18n();

const logout = () => router.post(route("auth.logout"));

const notificationModal = ref({
    open: false,
});

const localeDropdown = ref(false);

const flagRef = ref("fi fi-jp");

const locales = [
    { flag: "fi fi-jp", value: "ja", label: "Japanese" },
    { flag: "fi fi-gb", value: "en", label: "English" },
    { flag: "fi fi-mm", value: "my", label: "Myanmar" },
];

const onLocaleChange = (flag: string, value: string) => {
    localeDropdown.value = false;
    router.visit(route("app.locale", { locale: value }), {
        preserveScroll: true,
        preserveState: true,
        onSuccess() {
            flagRef.value = flag;
            locale.value = value;
        },
    });
};

const page = usePage() as any;

const notifications = computed(
    () => page.props.quiz_complete_notifications || []
);

const language = computed(
    () =>
        locales.find((l) => {
            return l.value === page.props.locale;
        })!.label
);

function onBackButtonClick(event: PopStateEvent) {
    if (event.state.page.url === "/login") {
        router.replace({ url: "/dashboard" });
    }
}

function hideLocalDropdown(e: Event) {
    const target = e.target as HTMLElement;
    if (!target.hasAttribute("data-locale")) {
        localeDropdown.value = false;
    }
}

watch(localeDropdown, (value) => {
    if (value) {
        document.body.addEventListener("click", hideLocalDropdown);
    } else {
        document.body.removeEventListener("click", hideLocalDropdown);
    }
});

const toast = useToast();

onMounted(() => {
    window.addEventListener("popstate", onBackButtonClick);
    window.Echo.channel("quiz-assigned-completed").listen(
        ".assign.finished",
        (e: any) => {
            router.reload({
                only: ["notifications"],
                onSuccess() {
                    toast.success(e.message, {
                        position: POSITION["BOTTOM_RIGHT"],
                        pauseOnFocusLoss: true,
                    });
                },
            });
        }
    );
});

onUnmounted(() => {
    document.body.removeEventListener("click", hideLocalDropdown);
    window.removeEventListener("popstate", onBackButtonClick);
    window.Echo.leave("quiz-assigned-completed");
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
