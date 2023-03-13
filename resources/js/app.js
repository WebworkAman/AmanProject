/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

import React from 'react';
import ReactDOM from 'react-dom';

import Home from './home'
import Page1 from './page1'

// 寫法一

// const renderHome = () => {
//     ReactDOM.render(
//         <Home />,
//         document.getElementById('main') 
//     )
// }
// window.renderHome = renderHome

// const renderPage1 = () => {
//     ReactDOM.render(
//         <Page1 />,
//         document.getElementById('main') 
//     )
// }
// window.renderPage1 = renderPage1

//優化寫法

window.render = {
    home : (containerTag,title) =>{
        ReactDOM.render(
            <Home title={title}/>,
            containerTag
        )
    },
      page1 : () =>{
        ReactDOM.render(
            <Page1 />,
            document.getElementById('main')
        )
    },
}

function App(){
    return <h1>Hello,Laravel&React</h1>;
}



function Greeting(props){
    return <h1>Hello,{props.name}!</h1>
}
// ReactDOM.render(<Greeting name="React" />, document.getElementById('app'));
export default Greeting;


