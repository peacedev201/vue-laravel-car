<template>
	<div>
		<transition name="fade"
		            mode="out-in">
			<router-view></router-view>
		</transition>
	</div>
</template>

<style>
	.nav li a.nav-link.router-link-exact-active.router-link-active {
		background: #20a8d8 !important;
	}
</style>