import React, { useState } from 'react'

const Multiple_Input_Handling = () => {

    const emptyData = {
        name: '',
        email: '',
        password: '',
        age: '',
        mobilenumber: ''
    }

    const [formData, setFormData] = useState(emptyData)

    const onChangeHandler = (e) => {
        const {name, value} = e.target

        setFormData({...formData, [name]:value})
    }

    const handleSubmit = (e) => {
        e.preventDefault();

        alert('Your form has been submitted');

        console.log(formData);

        setFormData(emptyData);
    }

    return (
        <div>
            <form method="get" className='form' onSubmit={handleSubmit}>
                <div>
                    <label htmlFor="name">Name:</label>
                    <input type="text" name="name" id="name" value={formData.name}
                        onChange={onChangeHandler}
                    />
                    <h4>{formData.name}</h4>
                </div>
                <div>
                    <label htmlFor="email">Email:</label>
                    <input type="email" name="email" id="email" value={formData.email}
                        onChange={onChangeHandler}
                    />
                    <h4>{formData.email}</h4>
                </div>
                <div>
                    <label htmlFor="password">Password:</label>
                    <input type="password" name="password" id="password" value={formData.password}
                        onChange={onChangeHandler}
                    />
                    <h4>{formData.password}</h4>
                </div>

                <div>
                    <label htmlFor="age">Age:</label>
                    <input type="number" name="age" id="age" value={formData.age}
                        onChange={onChangeHandler}
                    />
                    <h4>{formData.age}</h4>
                </div>

                <div>
                    <label htmlFor="mobilenumber">Mobile Number:</label>
                    <input type="mobilenumber" name="mobilenumber" id="mobilenumber" value={formData.mobilenumber}
                        onChange={onChangeHandler}
                    />
                    <h4>{formData.mobilenumber}</h4>
                </div>

                <div>
                    <button>Submit</button>
                </div>
            </form>
        </div>
    )
}

export default Multiple_Input_Handling