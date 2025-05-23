const express = require('express')
const engine = require('express-handlebars')

const path =  require('path')
const app = express()
const port = 3000

app.engine('handlebars', engine.engine());
app.set('view engine', 'handlebars');
app.set('views', './views');

// app.use(express.static(path.join(__dirname, "views")))
app.use('/', require(path.join(__dirname, 'routes/blog.js')))


app.listen(port, () => {
  console.log(`Blog app listening on port ${port}`)
})
