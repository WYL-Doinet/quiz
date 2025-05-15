<template>
    <QrcodeVue :value="qrValue" :size="250" :image-settings="imageSettings" />
    <p class="text-red-600 font-bold mt-3">This QR code can be used only once.</p>
</template>

<script setup lang="ts">
import QrcodeVue, { ImageSettings } from "qrcode.vue";
import { ref } from "vue";
const props = defineProps<{ userId: any }>();
import logo from "@images/qr-logo-2.svg";

const qrValue = ref("");

const res = await fetch(route("user.qr.login.code", props.userId), {
    headers: {
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
});

const imageSettings = ref<ImageSettings>({
    src: logo,
    width: 75,
    height: 75,
});

const data = await res.json();

qrValue.value = JSON.stringify({
    user_id: props.userId,
    qr_login_code: data.code,
});
</script>
