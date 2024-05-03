import React from 'react';
import { Link } from 'react-router-dom';
import Navbar from '../../components/Navbar';
import Footer from '../../components/Footer';

const Home = ({lps}) => {

  return (
    <div className=''>
        <Navbar landing_page_id={1} />
        <div className='w-1/3 mx-auto text-center mt-36 py-20'>
          <h1 className='text-4xl font-bold'>This is the home page</h1>
          {lps && lps.map(l=>(
            <div key={l.id} className=''>
              <Link to={l.link}>
                <button className='p-4 text-xl bg-blue-1 rounded-lg text-white mt-2'>Go To Landing Page {l.name}</button>
              </Link>
            </div>
          ))}
        </div>
        <div className="">
          <Footer/>
        </div>
    </div>
  )
}

export default Home