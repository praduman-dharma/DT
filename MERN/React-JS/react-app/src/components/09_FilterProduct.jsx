import React from 'react'

const FilterProduct = () => {
    const products = [
        { id: 1, title: "iphone - 14", category: "mobiles", price: 150000 },
        { id: 2, title: "iphone - 15", category: "mobiles", price: 100000 },
        { id: 3, title: "MI Tab", category: "tablets", price: 110000 },
        { id: 4, title: "Lenovo Ideapad", category: "laptops", price: 120000 },
        { id: 5, title: "HP Yoga", category: "laptops", price: 130000 },
        { id: 6, title: "Sony Camera", category: "cameras", price: 150000 }
    ];

    const filterData = products.filter((data) => data.category == 'mobiles');
    console.log(filterData);

  return (
    <div>
        {filterData.map((data) => 
            <div key={data.id}>
                <h1>Title: {data.title}</h1>
                <h2>Price: {data.price}</h2>
            </div>
        )}
    </div>
  )
}

export default FilterProduct