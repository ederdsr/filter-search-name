<script>
    export default {

    	props: ['users'],

    	data() {

    		return {
    			listUser:[],
    			sortAsc: true,
    			filterTerm: ''
    		}

    	},

    	computed: {
		  orderedUsers: function () {
		    	let result = this.listUser;
                let ascDesc = this.sortAsc ? 1 : -1;

                if (this.filterTerm) {
                    result = result.filter(item => item.name.includes(this.filterTerm));
                }

                return result.sort((a, b) => ascDesc * a.name.localeCompare(b.name));
		  }
		},

		methods: {
            invertSort() {
                this.sortAsc = !this.sortAsc;
            }
        },

        mounted () {
            this.listUser = JSON.parse(this.users);

        }
    }
</script>


<template>
    <div>
    	<div style="padding: 20px 0px 20px 0px">
    		<input type="text" class="form-control" placeholder="Filtrar a lista abaixo" v-model="filterTerm">
    	</div>
    	<table class="table table-bordered table-striped table-hover" >
			<thead>
				<tr>
					<th><a href="#" @click="invertSort()">Nome</a></th>
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>

				<tr v-for="user in orderedUsers">
					<td>{{ user.name }}</td>
					<td>{{ user.email }}</td>
				</tr>
			</tbody>		

		</table> 
    </div>
</template>

<style scoped=""></style>