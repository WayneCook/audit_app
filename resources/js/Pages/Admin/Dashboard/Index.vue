<template>
    <div>
        <h1>Dashboard</h1>
    </div>
</template>

<script>
import Layout from '@/Pages/Layout';

export default {
    layout: Layout,
    mounted() {
      console.log(this.$page.props.user);
    }
  }
</script>

