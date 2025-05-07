import React from 'react'

/*
const Product = (props) => {
    const obj = {
        title: 'Galaxy S24 Ultra',
        brand: 'Samsung',
        price: 150000
    }
  return (
    <div>
        <h2>Mobile Name: {props.title}</h2>
        <h4>Mobile Brand: {props.brand}</h4>
        <h4>Mobile Price: {props.price}</h4>

        <h3>Mobile RAM: {props.ram}</h3>
        <h3>Mobile ROM: {props.rom}</h3>
        <h3>Mobile Camera: {props.camera}</h3>
        <h3>Mobile Fingerprint: {props.fingerprint}</h3>
    </div>
  )
} */


const Product = ({title, brand, price, ram, rom, camera, fingerPrint}) => {
  return (
    <div>
        <h2>Mobile Name: {title}</h2>
        <h4>Mobile Brand: {brand}</h4>
        <h4>Mobile Price: {price}</h4>

        <h3>Mobile RAM: {ram}</h3>
        <h3>Mobile ROM: {rom}</h3>
        <h3>Mobile Camera: {camera}</h3>
        <h3>Mobile Finger Print: {fingerPrint}</h3>
    </div>
  )
}


export default Product