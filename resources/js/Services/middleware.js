import Cookie from "js-cookie";
export default{
    auth(to,from,next){
        console.log(to,from,next);
        const token = Cookie.get('_myapp_token')

        if (!token) {
            next('/')
        }

        next()
    },
}