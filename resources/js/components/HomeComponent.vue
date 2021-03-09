<template>
	<div>
		<h1 style="word-wrap: break-word;">{{ message }}</h1>
		<input v-model="username" type="text" />
		<input v-model="password" type="text" />
		<button v-on:click="login">Login</button>
	</div>
</template>

<script>
export default {
	data: function () {
		return {
			username: "player",
			password: "123qwe",
			message: "",
		};
	},
	mounted() {
		this.login();
	},
	methods: {
		login: function () {
			axios({
				url: "/api/player/login",
				method: "post",
				data: {
					username: this.username,
					password: this.password,
				},
			})
				.then((response) => {
					console.log(response.data);
					if (response.data.status == 1) {
						this.message = response.data.token;
					} else {
						this.message = "Invalid creds";
					}
				})
				.catch((err) => {
					this.message = err;
				});
		},
	},
};
</script>
