import React from 'react'
import Person from '../01_Person'
import Person2 from '../01_Person2'
import { Test } from './01_Test'
// if function is directly exported from file than need to use curly bracket for importing with same name.
import CustomName from './01_Test2'
// import with custom name
import Product from './03_Product'
import Person3 from './02_Person3'
import Person4 from './04_Person4'
import Laptop from './05_Laptop'

import Events from './06_Events'
import Counter from './07_Counter'
import ShowProduct from './08_ShowProduct'
import FilterProduct from './09_FilterProduct'

import Movies from './MovieZone/Movies'

import UseEffect from './10_UseEffect'
import Fetch_Data_API from './11_Fetch_Data_API'

import Form from './12_Form'
import Multiple_Input_Handling from './13_Multiple_Input_Handling'

import Meal from './FoodRecipe/Meal'

const Home = () => {
  return (
    <>
      <div>
        {/* <Person />
        <Person2 />
        <Test />
        <CustomName /> */}
      </div>

      <div>
        {/* <Product 
          title="Galaxy S24 Ultra"
          brand="Samsung"
          price={150000}
          ram="8 GB"
          rom="128 GB" 
          camera="200 MP"
        />
        <Product title="Iphone 16" brand="Apple" price={200000} />
        <Product title="OnePlus 13" brand="OnePlus" price={50000} fingerPrint="YES" /> */}
      </div>

      <div>
        {/* <Person3 name="John" age="20" salary={100000} />
        <Person3 name="Dev" age="25" salary={50000} />
        <Person3 name="Week" age="22" salary={10000} /> */}
      </div>

      <div>
        {/* <Person4 name="John" age={20} panCard={true} price={100} /> */}
      </div>

      <div>
        {/* <Laptop brandName="hp" model="probook" price={150000} />
        <Laptop brandName="lenovo" model="ideapad" price={100000} />
        <Laptop brandName="dell" model="inspiron" price={200000} /> */}
      </div>

      <div>
        {/* <Events /> */}
      </div>

      <div>
        {/* <Counter /> */}
      </div>

      <div>
        {/* <ShowProduct /> */}
      </div>

      <div>
        {/* <FilterProduct /> */}
      </div>

      <div>
        {/* <Movies /> */}
      </div>

      <div>
        {/* <UseEffect /> */}
      </div>

      <div>
        {/* <Fetch_Data_API /> */}
      </div>

      <div>
        {/* <Form /> */}
      </div>

      <div>
        {/* <Multiple_Input_Handling /> */}
      </div>

      <div>
        {/* <Meal /> */}
      </div>
    </>
  )
}

export default Home