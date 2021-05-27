<template>
    <footer class="main-footer">

        <!-- Default to the left -->
        <strong>Copyright &copy; {{ currentDate.getUTCFullYear() }} <a href="/home">Cabinet Médical </a>.</strong> All rights reserved.
    </footer>
</template>
<script>
export default {
    data() {
        return {
            currentDate: new Date,
        }

    },
}
</script>
