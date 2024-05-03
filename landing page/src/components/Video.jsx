import React from 'react';
import ReactPlayer from 'react-player';

const Video = ({path}) => {
  return (
    <div className='border-0 rounded-md overflow-hidden shadow-rounded'>
        <ReactPlayer
            url={path}
            controls
            width="100%"
            height="auto"
        />
    </div>
  )
}

export default Video