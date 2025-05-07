import React from 'react'
import { useParams, Link, useLocation, useNavigate } from 'react-router-dom'
import { courses } from './15_Course_Data.js'

const Course_Detail = () => {
    console.log(useParams())
    console.log(useLocation())

    const { slug } = useParams();
    const location = useLocation();
    const navigate = useNavigate();

    navigate('/')

    const course_detail =  courses.filter((course) => course.slug == slug)

    return (
        <>
            <div>
                {course_detail.map((data) => (
                    <div key={data.id}>
                        <h2>Course Name: {data.course_name}</h2>
                        <h3>Course Duration: {data.duration}</h3>

                        {location.pathname != '/course/python' && (
                            <>
                                <h3>Course Price: {data.price}</h3>
                            </>
                        )}

                    </div>
                ))}
            </div>

            <div>
                <Link to="/course">All Courses</Link>
            </div>
        </>
    )
}

export default Course_Detail