import React from 'react'
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import Home from './pages/14_Home'
import About from './pages/14_About'
import Team from './pages/14_Team'
import Contact from './pages/14_Contact'
import Course from './pages/15_Course'
import Course_Detail from './pages/15_Course_Detail'
import Dashboard from './pages/14_Dashboard'
import Profile from './pages/14_Profile'
import Movies from './components/MovieZone/Movies'
import Meal from './components/FoodRecipe/Meal'
import Navbar from './components/16_Navbar'
import IndianGov from './components/Home/17_IndianGov'


const App = () => {
    return (
        <>
            <Router>
                <Navbar />
                <Routes>
                    {/* <Route path='/' element={<Home />} /> */}
                    <Route path='/' element={<IndianGov />} />
                    <Route path='/about' element={<About />} />
                    <Route path='/team' element={<Team />} />
                    <Route path='/contact' element={<Contact />} />
                    <Route path='/movies' element={<Movies />} />
                    <Route path='/meal' element={<Meal />} />
                    <Route path='/course' element={<Course />} />
                    <Route path='/course/:slug' element={<Course_Detail />} />
                    <Route path='/dashboard' element={<Dashboard />} />
                    <Route path='/profile' element={<Profile />} />
                </Routes>
            </Router>
        </>
    )
}

export default App