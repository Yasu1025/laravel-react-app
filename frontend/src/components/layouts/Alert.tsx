interface Props {
  textColor?: string;
  content: string;
}

const Alert = ({ textColor = "black", content }: Props): JSX.Element => {
  return (
    // TODO: later
    <div className={`text-${textColor}-500`}>{content}</div>
  );
};

export default Alert;
