import React from 'react'
import { Link } from 'react-router-dom'

const Home = () => {
  return (
    <div>
      <div>Home</div>
      <Link to="/about">About</Link>
      <Link to="/meal">Meal</Link>
      <Link to="/course">Course</Link>
      <Link to="/contact">Contact</Link>
    </div>
  )
}

export default Home