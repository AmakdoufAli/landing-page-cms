import { WhatsapIcon } from "../assets/images"

const WhatsappContact = () => {
  return (
    <div className='fixed bottom-2 right-2'>
        <a href="https://wa.me/+212693546107?text=Salut" target='_blank'>
            <img src={WhatsapIcon} alt="whatsapp icon" width={50} height={50} />
        </a>
    </div>
  )
}

export default WhatsappContact