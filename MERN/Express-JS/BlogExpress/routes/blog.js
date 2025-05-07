const express = require('express')
const path =  require('path')
const blogs = require('../data/blogs')

const router = express.Router()

router.get('/', (req, res) => {
    // res.sendFile(path.join(__dirname, '../views/index.html'))
    res.render('home')
})

router.get('/blog', (req, res) => {
    // res.sendFile(path.join(__dirname, '../views/bloghome.html'))

    res.render('blogHome', {
        blogs: blogs
    })
})


router.get('/blog/:slug', (req, res) => {
    myBlog = blogs.filter((e) => {
        return e.slug == req.params.slug
    })

    // console.log(myBlog)

    // res.sendFile(path.join(__dirname, '../views/blogpage.html'))

    res.render('blogPage', {
        blog: myBlog[0]
    })
})

module.exports = router