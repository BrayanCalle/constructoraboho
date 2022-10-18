var recentAside = new Vue({
    el: "#recent-aside",
    data: {
        blogs: []
    },
    mounted() {
        fetch("blogs.json")
        .then(response => response.json())
        .then((res) => {
            this.blogs = res;
        }).catch((err) => {
            console.log(err);
        });
    },
    computed: {
        lastBlogs: function() {
            return this.blogs.slice(-4);
        }
    }

})