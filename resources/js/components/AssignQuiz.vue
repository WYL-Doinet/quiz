<template></template>

<script setup lang="ts">

const res = await fetch('/', {
    headers: {
        Accept: 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
})

const quizzes = await res.json()

</script>