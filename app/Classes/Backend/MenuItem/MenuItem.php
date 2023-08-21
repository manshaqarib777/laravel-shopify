<?php

namespace App\Classes\Backend\MenuItem;

class MenuItem implements IMenuItem
{
    public function __construct(array $data)
    {
        $this->setPosition($data['position'] ?? -1);
        $this->setParent($data['parent'] ?? null);
        $this->setName($data['name'] ?? '');
        $this->setText($data['text'] ?? '');
        $this->setIcon($data['icon'] ?? '');
        $this->setRedirect($data['redirect'] ?? '');
        $this->setRouteName($data['route_name'] ?? '');
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function setParent($parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function setRedirect(string $redirect): self
    {
        $this->redirect = $redirect;

        return $this;
    }

    public function setRouteName(string $route_name): self
    {
        $this->route_name = $route_name;

        return $this;
    }

    public function getPosition(): int
    {
        return $this->position ?? -1;
    }

    public function getParent(): string
    {
        return $this->parent ?? null;
    }

    public function getName(): string
    {
        return $this->name ?? '';
    }

    public function getIcon(): string
    {
        return $this->icon ?? '';
    }

    public function getText(): string
    {
        return $this->text ?? '';
    }

    public function getRedirect(): string
    {
        return $this->redirect ?? '';
    }

    public function getRouteName(): string
    {
        return $this->route_name ?? '';
    }
}
