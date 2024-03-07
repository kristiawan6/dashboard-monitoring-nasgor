import { twMerge } from "tailwind-merge";
import { Dialog as HeadlessDialog, Transition } from "@headlessui/react";
import { Fragment, createContext, useContext, useRef, useState } from "react";

type Size = "sm" | "md" | "lg" | "xl";

const slideOverContext = createContext<{
  open: boolean;
  zoom: boolean;
  size: Size;
}>({
  open: false,
  zoom: false,
  size: "md",
});

function SlideOver({
  children,
  className,
  as = "div",
  open = false,
  onClose,
  staticBackdrop,
  size = "md",
  ...props
}: ExtractProps<typeof HeadlessDialog> & {
  size?: Size;
  staticBackdrop?: boolean;
}) {
  const focusElement = useRef<HTMLElement | null>(null);
  const [zoom, setZoom] = useState(false);

  return (
    <slideOverContext.Provider
      value={{
        open: open,
        zoom: zoom,
        size: size,
      }}
    >
      <Transition appear as={Fragment} show={open}>
        <HeadlessDialog
          as={as}
          onClose={(value) => {
            if (!staticBackdrop) {
              return onClose(value);
            } else {
              setZoom(true);
              setTimeout(() => {
                setZoom(false);
              }, 300);
            }
          }}
          initialFocus={focusElement}
          className={twMerge(["relative z-[60]", className])}
          {...props}
        >
          {children}
        </HeadlessDialog>
      </Transition>
    </slideOverContext.Provider>
  );
}

SlideOver.Panel = ({
  children,
  className,
  as = "div",
  ...props
}: ExtractProps<typeof HeadlessDialog.Panel> & {
  size?: Size;
}) => {
  const slideOver = useContext(slideOverContext);
  return (
    <>
      <Transition.Child
        as="div"
        enter="ease-in-out duration-500"
        enterFrom="opacity-0"
        enterTo="opacity-100"
        leave="ease-in-out duration-[400ms]"
        leaveFrom="opacity-100"
        leaveTo="opacity-0"
        className="fixed inset-0 bg-black/60"
        aria-hidden="true"
      />
      <Transition.Child
        as="div"
        enter="ease-in-out duration-500"
        enterFrom="opacity-0 -mr-[100%]"
        enterTo="opacity-100 mr-0"
        leave="ease-in-out duration-[400ms]"
        leaveFrom="opacity-100 mr-0"
        leaveTo="opacity-0 -mr-[100%]"
        className="fixed inset-y-0 right-0"
      >
        <HeadlessDialog.Panel
          as={as}
          className={twMerge([
            "w-[90%] ml-auto h-screen flex flex-col bg-white relative shadow-md transition-transform dark:bg-darkmode-600",
            slideOver.size == "md" && "sm:w-[460px]",
            slideOver.size == "sm" && "sm:w-[300px]",
            slideOver.size == "lg" && "sm:w-[600px]",
            slideOver.size == "xl" && "sm:w-[600px] lg:w-[900px]",
            slideOver.zoom && "scale-105",
            className,
          ])}
          {...props}
        >
          {children}
        </HeadlessDialog.Panel>
      </Transition.Child>
    </>
  );
};

SlideOver.Title = ({
  children,
  className,
  as = "div",
  ...props
}: ExtractProps<typeof HeadlessDialog.Title>) => {
  return (
    <HeadlessDialog.Title
      as={as}
      className={twMerge([
        "flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400",
        className,
      ])}
      {...props}
    >
      {children}
    </HeadlessDialog.Title>
  );
};

SlideOver.Description = ({
  children,
  className,
  as = "div",
  ...props
}: ExtractProps<typeof HeadlessDialog.Description>) => {
  return (
    <HeadlessDialog.Description
      as={as}
      className={twMerge(["p-5 overflow-y-auto flex-1", className])}
      {...props}
    >
      {children}
    </HeadlessDialog.Description>
  );
};

SlideOver.Footer = <C extends React.ElementType = "div">({
  children,
  className,
  as,
  ...props
}: {
  as?: C;
} & React.PropsWithChildren &
  React.ComponentPropsWithoutRef<C>) => {
  const Component = as || "div";

  return (
    <Component
      className={twMerge([
        "px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400",
        className,
      ])}
      {...props}
    >
      {children}
    </Component>
  );
};

export default SlideOver;
