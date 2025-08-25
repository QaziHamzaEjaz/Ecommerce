<!-- <script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div>
    <nav>
      <Link href="/blogs">Blogs</Link>
    </nav>
    <slot />
  </div>
</template> -->

<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props?.auth?.user || null;
</script>

<template>
  <div>
    <nav v-if="user">
      <template v-if="user.type === 'Admin'">
        <a href="/admin">Admin Dashboard</a>
      </template>
      <template v-else>
        <a href="/user">User Dashboard</a>
      </template>
    </nav>
    <router-view />
  </div>
</template>
