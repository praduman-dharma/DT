// form handling

import React from 'react'
import { useState } from 'react'

const Form = () => {
    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')

    const handleSubmit = (e) => {
        e.preventDefault();

        alert('Your form has been submitted ' + name + ' ' + email + ' ' + password);

        setName('');
        setEmail('');
        setPassword('');
    }

    return (
        <div>
            <form method="get" className='form' onSubmit={handleSubmit}>
                <div>
                    <label htmlFor="name">Name:</label>
                    <input type="text" name="name" id="name" value={name}
                        onChange={(e) => setName(e.target.value)}
                    />
                    <h4>{name}</h4>
                </div>
                <div>
                    <label htmlFor="email">Email:</label>
                    <input type="email" name="email" id="email" value={email}
                        onChange={(e) => setEmail(e.target.value)}
                    />
                    <h4>{email}</h4>
                </div>
                <div>
                    <label htmlFor="password">Password:</label>
                    <input type="password" name="password" id="password" value={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                    <h4>{password}</h4>
                </div>

                <div>
                    <button>Submit</button>
                </div>
            </form>
        </div>
    )
}

export default Form