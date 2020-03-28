class Github{

    constructor(){
        this.client_id='2a12743b32e0e99a7433';
        this.client_secret='83621f7b8ed6b04b696e31dc24c3a2b68c0e6331';
        this.repos_count=5;
        this.repos_sort='created :asc';
    }

    async getuser(user){
        const profileresponse =await fetch(`https://api.github.com/users/${user}?client_id=
        ${this.client_id}&client_secret=${this.client_secret}`);

        const reporesponse =await fetch(`https://api.github.com/users/${user}/repos?per_page=${this.repos_count}
        &sort=${this.repos_sort}&client_id=${this.client_id}&client_secret=${this.client_secret}`);

        
        const profile= await profileresponse.json();
        const repos= await reporesponse.json();
        
        return{
            profile,
            repos
        }
    }
}