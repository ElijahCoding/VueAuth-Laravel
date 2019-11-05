<template>
    <ul>
        <li>
            <router-link
                    :to="{
                    name: 'home'
                }"
            >
                Home
            </router-link>
        </li>
            <li>
                username
            </li>

            <li>
                <router-link
                        :to="{
                            name: 'signin'
                        }"
                >
                    Sign in
                </router-link>
            </li>
            <li>
                <router-link
                        :to="{
                            name: 'dashboard'
                        }"
                >
                    Dashboard
                </router-link>
            </li>
            <li>
                <a href="#" @click.prevent="signOut">
                    Sign out
                </a>
            </li>
    </ul>
</template>