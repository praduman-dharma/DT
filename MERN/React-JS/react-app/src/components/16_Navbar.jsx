import React, { useState } from 'react'
import { Link, useNavigate } from 'react-router-dom'
import './16_navbar.css'

const Navbar = () => {
    const [isLoggedIn, setIsLoggedIn] = useState(false)
    const navigate = useNavigate()

    const login = () => {
        setIsLoggedIn(true)
        navigate('/dashboard')
    }

    const logout = () => {
        setIsLoggedIn(false)
    }

    return (
        <div className='navbar menu'>
            <div className="left">
                <Link className='item' to={'/'}>Navbar</Link>
            </div>
            <div className="right">
                <Link className='item' to={'/movies'}>Movies</Link>
                <Link className='item' to={'/meal'}>Meal</Link>
                <Link className='item' to={'/course'}>Courses</Link>
                <Link className='item' to={'/dashboard'}>Dashboard</Link>
                <Link className='item' to={'/profile'}>Profile</Link>
                <Link className='item' to={'/about'}>About</Link>
                <Link className='item' to={'/team'}>Team</Link>
                <Link className='item' to={'/contact'}>Contact</Link>
                {!isLoggedIn && (
                    <>
                        <button className='item' style={{ fontWeight: '600', backgroundColor: 'gray' }} onClick={login}>Login</button>
                    </>
                )}
                {isLoggedIn && (
                    <>
                        <Link className='item' style={{ fontWeight: '600', backgroundColor: 'gray' }} onClick={logout}>Logout</Link>
                    </>
                )}
            </div>
        </div>
    )
}

export default Navbar