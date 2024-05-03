import Navbar from './Navbar';
import Footer from './Footer';
// import { GreenCheckedMard } from '../assets/images';

const SuccesPayment = ({t}) => {
  return (
    <div>
        <Navbar/>
        <div className='flex flex-col items-center justify-center gap-3 h-lvh'>
            {/* <img src={GreenCheckedMard} alt="green checked mark" width={200}/> */}
            <h1 className='text-3xl font-extrabold text-green-600'>{t('pages.succes.titre')}</h1>
            <h3 className='text-2xl font-bold text-green-900'>{t('pages.succes.message')}</h3>
        </div>
        <Footer/>
    </div>
  )
}

export default SuccesPayment