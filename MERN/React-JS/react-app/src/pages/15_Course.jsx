import React from 'react'
import { Link } from 'react-router-dom'
import { courses } from './15_Course_Data.js'

const Course = () => {
    return (
        <div>
            <ul>
                {courses.map((data) =>
                    <div key={data.id}>
                        <li>
                            <Link to={`/course/${data.slug}`}>{data.course_name}</Link>
                        </li>
                    </div>
                )}
            </ul>
        </div>
    )
}

export default Course